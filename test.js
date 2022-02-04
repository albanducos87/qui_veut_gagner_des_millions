function zoomPresentateur() {
    document.dispatchEvent(new KeyboardEvent('keydown',{'key':'p'}));
}

function dezoomPresentateur() {
    document.dispatchEvent(new KeyboardEvent('keydown',{'key':'P'}));
}

function lumiereEnHaut() {
    document.dispatchEvent(new KeyboardEvent('keydown',{'key':'l'}));
}

function lumiereEnBas() {
    document.dispatchEvent(new KeyboardEvent('keydown',{'key':'L'}));
}







