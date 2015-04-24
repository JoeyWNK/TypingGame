/**
 * Created by nk on 2015/4/10.
 */

var stage;
var stageHigh;
var stageWide;
var background = "#000";
var fontSetting = "10px Arial";
var fontColor = "#DDD";
var text;

function init() {
    stage = new createjs.Stage('Game');
    stageHigh = stage.canvas.height;
    stageWide = stage.canvas.width;

    //Alternatively use can also use the graphics property of the Shape class to renderer the same as above.
    var back = new createjs.Shape();
    back.graphics.beginFill(background).drawRect(0, 0, stageWide, stageHigh);
    text = new createjs.Text("", fontSetting, fontColor);
    text.x = text.y = 120;

    underconstruction = new createjs.Text("Sorry: Under Coding", fontSetting, fontColor);
    underconstruction.x = 90;
    underconstruction.y = 40;
    stage.addChild(underconstruction, text);

    stage.update();
    this.document.onkeydown = updateText;

}
function updateText(e) {

    var keyASCII = String.fromCharCode(e.keyCode);
    text.text = e.keyCode + ":" + keyASCII + ":" + e.shiftKey;
    stage.update(e);
}
/**
 * preloading files
 * @manifestFile string the URL of manifest file,should be string. the data format should be JSON
 * */
function preload(manifestFile) {


    var queue = new createjs.LoadQueue(true);
    queue.on("fileload", handleFileLoaded);
    quene.on("error", handleError);


}

function handleFileLoaded(event) {
    var item = event.item;
    var result = event.result;

    switch (item.type) {
        case createjs.AbstractLoader.CSS:
            (document.head || document.getElementsByTagName("head")[0]).appendChild(result);
            break;

        case createjs.AbstractLoader.IMAGE:
            break;

        case createjs.AbstractLoader.JAVASCRIPT:
            document.body.appendChild(result);
            break;

        case createjs.AbstractLoader.JSON:
        case createjs.AbstractLoader.XML:
            break;
        case createjs.AbstractLoader.JSONP:
            break;
        case createjs.AbstractLoader.SOUND:
            document.body.appendChild(result);
            break;

        case createjs.AbstractLoader.SVG:
            break
    }
}




