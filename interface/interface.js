/**
 * Created by ives on 2015/5/19.
 */

//Constructor.

var Interface = function(name,methods){//����һ���ӿڷ����������������ͷ�����
    if(arguments.length != 2){//��������ĳ��Ȳ�����2�����׳�����
        throw new Error("Interface constructor called with" + arguments.length + "arguments, but expected exactly 2.");
    }
    this.name = name;//���巽����
    this.methods = [];//���巽����
    for(var i = 0,len = methods.length; i <len; i++){
        if(typeof methods[i] !== 'string'){
            throw new Error("�ӿڷ��������Ʊ�����һ���ַ���");
        }
        this.methods.push(methods[i]);
    }
};

//Static class Method

Interface.ensureImplements = function(object){
    if(arguments.length<2){
        throw new Error("���� Interface.ensureImplemnents ָ����" + arguments.length+ "��������������������2�� .");
    }
    for(var i=1,len = arguments.length; i<len; i++){
        var _interface = arguments[i];
        if(_interface.constructor !== Interface){
            throw new Error("���� Interface.ensureImplements ������������������ʵ���������");
        }

        for(var j=0, methodsLen = _interface.methods.length; j<methodsLen;j++ ){
            var method = _interface.methods[j];
            if(!object[method]||typeof object[method] !== 'function'){
                throw new Error("Function Interface.ensureImplements: object does not implements the "+_interface.name + "interface. Method "+ method + " was not found");
            }
        }
    }
};

//Next~~ ������ʵ�ֽӿ�~~

/* design interface*/
var MyInterface = new Interface('MyInterface',['username','password']);
/* implements the methods of the interface*/

var MyObject = function(name){
    this.name = name;
}
MyObject.prototype.username = function(){
    alert('username');
}
MyObject.prototype.password = function(){
    alert('password');
}
MyObject.prototype.else = function(){
    alert('else');
}


window.onload = function(){
    var myObj = new MyObject('jgx');
    Interface.ensureImplements(myObj,MyInterface);
    myObj.D();
}
