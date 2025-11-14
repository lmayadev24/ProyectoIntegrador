const diccionario = {
    "a": "⠁",
    "b": "⠃",
    "c": "⠉",
    "d": "⠙",
    "e": "⠑",
    "f": "⠋",
    "g": "⠛",
    "h": "⠓",
    "i": "⠊",
    "j": "⠚",
    "k": "⠅",
    "l": "⠇",
    "m": "⠍",
    "n": "⠝",
    "ñ": "⠻",
    "o": "⠕",
    "p": "⠏",
    "q": "⠟",
    "r": "⠗",
    "s": "⠎",
    "t": "⠞",
    "u": "⠥",
    "v": "⠧",
    "w": "⠺",
    "x": "⠭",
    "y": "⠽",
    "z": "⠵",

    "á": "⠈⠁",
    "é": "⠈⠑",
    "í": "⠈⠊",
    "ó": "⠈⠕",
    "ú": "⠈⠥",

    "1": "⠼⠁",
    "2": "⠼⠃",
    "3": "⠼⠉",
    "4": "⠼⠙",
    "5": "⠼⠑",
    "6": "⠼⠋",
    "7": "⠼⠛",
    "8": "⠼⠓",
    "9": "⠼⠊",
    "0": "⠼⠚",

    ".": "⠲",
    ",": "⠂",
    ";": "⠆",
    ":": "⠒",
    "?": "⠦",
    "!": "⠖",
    "¿": "⠢",
    "¡": "⠮",
    "\"": "⠐⠦",
    "'": "⠄",
    "-": "⠤",
    "(": "⠶",
    ")": "⠶",

    //Espacio
    " ": " "
}

function Traducir(textSpanish, textBraille){
    var texto = textSpanish.value.trim();
    if(!texto){
        alert("No hay nada por traducir");
        return;
    }

    textBraille.value= texto.toLowerCase().split("").map(letra => diccionario[letra] || letra).join("");
}