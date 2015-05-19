/**
 * Created by ives on 2015/5/19.
 */

//Constructor.

var Interface = function(name,methods){//定义一个接口方法，包括方法名和方法体
    if(arguments.length != 2){//如果参数的长度不等于2，则抛出错误
        throw new Error("Interface constructor called with" + arguments.length + "arguments, but expected exactly 2.");
    }
    this.name = name;//定义方法名
    this.methods = [];//定义方法体
    for(var i = 0,len = methods.length; i <len; i++){
        if(typeof methods[i] !== 'string'){
            throw new Error("接口方法的名称必须是一个字符串");
        }
        this.methods.push(methods[i]);
    }
};

//Static class Method

Interface.ensureImplements = function(object){
    if(arguments.length<2){
        throw new Error("方法 Interface.ensureImplemnents 指定了" + arguments.length+ "个参数，但是期望的是2个 .");
    }
    for(var i=1,len = arguments.length; i<len; i++){
        var _interface = arguments[i];
        if(_interface.constructor !== Interface){
            throw new Error("方法 Interface.ensureImplements 期望两个或两个以上实例对象参数");
        }

        for(var j=0, methodsLen = _interface.methods.length; j<methodsLen;j++ ){
            var method = _interface.methods[j];
            if(!object[method]||typeof object[method] !== 'function'){
                throw new Error("Function Interface.ensureImplements: object does not implements the "+_interface.name + "interface. Method "+ method + " was not found");
            }
        }
    }
};

//Next~~ 我们来实现接口~~

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
