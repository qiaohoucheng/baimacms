;
layui.extend({
    setter: "config",
    admin: "lib/admin",
    view: "lib/view",
    treetable:"treetable-lay/treetable",
    inputTags:"lib/input-tags/inputTags"
}).define(["setter", "admin","treetable"], function(exports) {
    var obj = {
        hello: function(str){
            alert('Hello '+ (str||'mymod'));
        }
    }
    exports("indexs",obj);
});