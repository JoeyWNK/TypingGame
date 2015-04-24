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
            "record": [{"date": "2015,5,5", "time": 300, "words": 100, "total_pressed": 700, "correct_pressed": 600}],
            "info": {"level": 2, "bonjor": "Hi, beginner~"}
        }
    };
}

/**
 * To begin a GAME
 * @diff int
 * @level int
 * @returns obj A JSONObject with text and time limited
 * */
function GETGAME(diff, level) {
    return {
        "text": "Have a nice day~",
        "time": 30000
    };
}
