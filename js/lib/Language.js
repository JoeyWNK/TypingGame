/**
 * Created by nk on 2015/4/12.
 */
/**
 * Convert the keycode to its character
 * @keycode int the keycode of the key typed
 * @isShift boolean whether the shift is clicked
 *
 * */
function ConvertKeyCodeToChar(keycode, isShift) {
    if (keycode > 64 && keycode < 91) {
        var char = String.fromCharCode(keycode);
        if (isShift)
            return char.toUpperCase();
        else
            return char.toLowerCase();
    } else if (keycode > 47 && keycode < 58) {
        if (isShift) {
            switch (keycode) {
                case 48:
                    return ')';
                case 49:
                    return '!';
                case 50:
                    return '@';
                case 51:
                    return '#';
                case 52:
                    return '$';
                case 53:
                    return '%';
                case 54:
                    return '^';
                case 55:
                    return '&';
                case 56:
                    return '*';
                case 57:
                    return '(';
            }
        } else
            return String.fromCharCode(keycode);
    } else {
        switch (keycode) {
            case 13:
                return '\n';

            case 32:
                return ' ';

            case 186:
                return ';';
            case 187:
                return '=';
            case 188:
                return ',';
            case 189:
                return '-';
            case 190:
                return '.';
            case 191:
                return '/';
            case 192:
                return '`';

            case 219:
                return '[';
            case 220:
                return '\\';
            case 221:
                return ']';
            case 222:
                return '\'';

        }
    }
}