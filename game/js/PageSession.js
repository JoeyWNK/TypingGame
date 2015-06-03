/**
 * Created by nk on 2015/4/10.
 */

/**
 * To get the current USERINFO
 * @returns obj A JSONObject with basic info of USER
 *
 */
function GETUSER() {
    return {
        "userinfo": {
            "name": "Joey",
            "info": {"level": 2, "bonjor": "Hi, beginner~"}
        }
    };
}

/**
 * To begin a GAME
 * @diff int
 * @level int
 * @returns obj A JSONObject with showingtext and time limited
 * */
function GETGAME(diff, level) {
    return {
        "text": "Have a nice day~uyrdfjkgfdhyddyjudfbnkjyfcjy",
        "time": 30000
    };
}


