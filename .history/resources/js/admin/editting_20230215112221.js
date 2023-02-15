function Editing (){}

Editing.prototype.init = function(){
    this.addCkeditor()
}
Editing.prototype.addCkeditor = function(){
    $('.ckeditor')
}
window.EditingController = new Editing();
EditingController.init()