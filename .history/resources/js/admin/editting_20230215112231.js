function Editing (){}

Editing.prototype.init = function(){
    this.addCkeditor()
}
Editing.prototype.addCkeditor = function(){
    $('.ckeditor-box').each(function(inde){})
}
window.EditingController = new Editing();
EditingController.init()