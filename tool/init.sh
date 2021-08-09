#!/bin/bash

SHELL_DIR=$(pwd)

ROOTDIR=$(cd "$(dirname "$0")/.."; pwd)
cd $ROOTDIR || exit

# 域名相关替换
echo "input project domain: "
while read DOMAIN
do
if [ ""x != "$DOMAIN"x ]; then 
	break 
fi
done

gsed -i "s/{DOMAIN}/${DOMAIN}/g" webroot/index.php
gsed -i "s/{DOMAIN}/${DOMAIN}/g" tool/*.php
mv inf/admin.sample.com inf/${DOMAIN}
mv inf/test-admin.sample.com inf/test-${DOMAIN}
cd inf && ln -s test-${DOMAIN} local-${DOMAIN} && cd ../


# configDb.php 内变量替换
echo "input db host: [default: 127.0.0.1] "
read DBHOST
if [ ""x == "$DBHOST"x ];then
	DBHOST="127.0.0.1"
fi
gsed -i "s/{DBHOST}/${DBHOST}/g" `find inf/ -type f -name "configDb.php"`

echo "input db name: "
while read DBNAME
do
if [ ""x != "$DBNAME"x ]; then 
	break 
fi
done
gsed -i "s/{DBNAME}/${DBNAME}/g" `find inf/ -type f -name "configDb.php"`

echo "===========DONE============"
echo "remove init shell (y/n)? [default: y]"
read INPUT
if [ "N"X != `echo $INPUT"X"|tr '[a-z]' '[A-Z]'` ]; then
	cd $SHELL_DIR && /bin/rm ./$0
fi

