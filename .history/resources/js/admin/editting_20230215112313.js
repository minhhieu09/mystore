function Editing (){}

Editing.prototype.init = function(){
    this.addCkeditor()
}
Editing.prototype.addCkeditor = function(){
    $('.ckeditor-box').each(function(index, item){
        var editor = CKEDITOR.replace($item).attr()
        })
}
window.EditingController = new Editing();
EditingController.init()