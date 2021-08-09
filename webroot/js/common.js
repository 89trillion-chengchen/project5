 $("#checkAll").click(function() {
      $(this).is(':checked') ? $('input[name="subBox"]').prop("checked",true) : $('input[name="subBox"]').prop('checked', false);
  });

  $('#delete_soft').click(function(){
    var str="";
    $("input[name='subBox']:checkbox").each(function(){ 
        if($(this).is(":checked")){
            str += $(this).val()+","
        }
    })
    str.split(",");
    $.post("/"+ $(this).val() +"/remove", { "ids": str },
      function(data){
         if (data.state == 0) {
            $("input[name='subBox']:checkbox").each(function(){ 
                if($(this).is(":checked")){
                  $(this).parent().parents('tr').remove();
                }
            })
            location.reload();
         } else {
            alert(data.message);
         }
      }, "json");

  })

  $("input[name=pkgnames]").focus(function(){
    $("#add_pkgname").removeAttr('disabled');
  });


  $("#selectid").find('tr').children('#datatd').each(function (){  
    $(this).dblclick(tdclick);
  })
  function tdclick(){
      var clickfunction = this;
      //0,获取当前的td节点
      var td = $(this);
      //1,取出当前td中的文本内容保存起来
      var text = $(this).text();
      //2，清空td里边内同
      td.html("");
      //3,建立一个文本框，也就是建一个input节点
      var input = $("<input>");
      //4,设置文本框中值是保存起来的文本内容
      input.attr("value",text);
      //4.5让文本框可以相应键盘按下的事件
      input.keyup(function(event){
          //记牌器当前用户按下的键值
          var myEvent = event || window.event;//获取不同浏览器中的event对象
          var kcode = myEvent.keyCode;
          //判断是否是回车键按下
          if(kcode == 13){
              var inputnode = $(this);
              //获取当前文本框的内容
              var inputext = inputnode.val();
              //清空td里边的内容,然后将内容填充到里边
              var tdNode = inputnode.parent();
              //获取ID
              var id = tdNode.prev().children('input').val();

              $.post("/soft/update", { "id": id, "pkgname": inputext},
              function(data){
                 if (data.state == 0) {
                    tdNode.html(inputext);
                    //让td重新拥有点击事件
                    $("#datatd").dblclick(tdclick);
                 } else {
                    alert(data.errors);
                 }
              }, "json");
              
              
          }
      });
      //5，把文本框加入到td里边去
      td.append(input);
      //5.5让文本框里边的文章被高亮选中
      //需要将jquery的对象转换成dom对象
      var inputdom = input.get(0);
      inputdom.select();
     
      //6,需要清楚td上的点击事件
      td.unbind("click");
  }