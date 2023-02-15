function Editing (){}

Editing.prototype.init = function(){
    this.addCkeditor()
}

window.EditingController = new Editing();
EditingController.init()