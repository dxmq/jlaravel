function del(){
    if(!confirm("确认要删除吗？")){
        window.event.returnValue = false;
    }
}