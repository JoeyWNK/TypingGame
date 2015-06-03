/**
 * Created by nk on 2015/4/10.
 */



var stage;
var stageHigh;
var stageWide;
var fontSetting = "22px Arial";
var showingtext;
var typingtext;
var lifebar;
var battlescreen1;
var battlescreen2;
var battlescreen3;
var error = 0;
var queue
function init() {
    createjs.Ticker.timingMode = createjs.Ticker.RAF;
    //createjs.Ticker.addEventListener("tick", tick);

    queue = new createjs.LoadQueue(true, "images/");
    queue.on("complete", FinishLoading, this);

    manifest = [{id: "ef", src: "efire.jpg"}
        , {id: "mf", src: "mfire.jpg"}
        , {id: "nf", src: "nfire.jpg"}
        , {id: "oc", src: "oilcan.png"}];

    queue.loadManifest(manifest, true);


}
function updateText(e) {
    var current_lenth = typingtext.text.length;
    var chartocheck = showingtext.text[current_lenth];
    var entered = ConvertKeyCodeToChar(e.keyCode, e.shiftKey);
    if (entered == chartocheck) {
        typingtext.text += entered;
        if (entered == ' '){
            //battlescreen.gotoAndPlay("my");
            battlescreen2.visible = true;
            battlescreen1.visible = false;
        } else {
            battlescreen2.visible = false;
            battlescreen1.visible = true;
        }
        if (showingtext.text.length == current_lenth+1){
            typingtext.text = "";
        }
        stage.update(e);
    } else {
        console.log(chartocheck + ":" + entered);
        error++;
    }

}
/**
 * preloading files
 * @manifestFile string the URL of manifest file,should be string. the data format should be JSON
 * */
function FinishLoading(event) {
    stage = new createjs.Stage('Game');
    stage.autoClear = true;
    stageHigh = stage.canvas.height;
    stageWide = stage.canvas.width;

    //Alternatively use can also use the graphics property of the Shape class to renderer the same as above.
    var back1 = new createjs.Shape();
    back1.graphics.beginFill("#000").drawRect(0, 0, 800, 600);
    var back2 = new createjs.Shape();
    back2.graphics.beginFill("#2D1D10").drawRect(0, 0, 800, 200);
    var back3 = new createjs.Shape();
    back3.graphics.beginFill("#D0C89A").drawRect(0, 0, 550, 350);
    var back4 = new createjs.Shape();
    back4.graphics.beginFill("#D0C89A").drawRect(0, 0, 150, 300);
    showingtext = new createjs.Text("", fontSetting, "#fff69d");
    typingtext = new createjs.Text("", fontSetting, "#1578ab");

    typingtext.x = typingtext.y = showingtext.x = showingtext.y = 20;
    showingtext.maxWidth = typingtext.maxWidth = 760;
    showingtext.lineWidth = typingtext.lineWidth = 750;
    showingtext.lineHeight = typingtext.lineHeight = 35;
    showingtext.height = typingtext.height = 560;
    showingtext.mask = back2;

    var lifecan = new createjs.Bitmap(queue.getResult("oc"));
    lifebar = new createjs.Shape();
    lifebar.graphics.beginFill("#0e5800").drawRect(63, 126, 27, 104);
    /*var sheet = new createjs.SpriteSheet({
        framerate:30,
        images:["images/nfire.jpg","images/mfire.jpg","images/nfire.jpg"],
        frames:{"height": 350,"width": 550},
        animations: {
            nofire:0,
            my:[1,1,"nofire",0.5],
            en:2,
        }
    });

    battlescreen = new createjs.Sprite(sheet);
    battlescreen.currentFrame = 0;
    battlescreen.x = battlescreen.y =50;*/
    battlescreen1 = new createjs.Bitmap(queue.getResult("nf"));
    battlescreen2 = new createjs.Bitmap(queue.getResult("mf"));
    battlescreen3 = new createjs.Bitmap(queue.getResult("ef"));
    battlescreen2.visible = false;
    battlescreen3.visible = false;
    var leftcontainer;
    var rightcontainer;
    var bottomcontainer;
    leftcontainer = new createjs.Container();
    rightcontainer = new createjs.Container();
    bottomcontainer = new createjs.Container();

    leftcontainer.x = 50;
    leftcontainer.y = 50;
    leftcontainer.height = 300;
    leftcontainer.width = 500;
    leftcontainer.mask = back3;
    leftcontainer.addChild(back3,battlescreen1,battlescreen2,battlescreen3);


    rightcontainer.x = 600;
    rightcontainer.y = 50;
    rightcontainer.height = 300;
    rightcontainer.width = 150;

    rightcontainer.addChild(back4, lifebar, lifecan);


    bottomcontainer.x = 0;
    bottomcontainer.y = 400;
    bottomcontainer.height = 200;
    bottomcontainer.width = 800;
    bottomcontainer.addChild(back2, showingtext, typingtext);

    stage.addChild(back1, leftcontainer, rightcontainer, bottomcontainer);

    this.document.onkeydown = updateText;
    jQuery.get("testText.txt",function(data){
        showingtext.text = data;
        stage.update();
    })
    stage.update(event);
}



