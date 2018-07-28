'use strict'

function sendGetRequest(url, cbf) {
    const xhr = new XMLHttpRequest();

    xhr.onload = cbf;

    xhr.onerror = xhr.onabort = (() => {
        alert('HTTP request error');
    });
    //hrq.onreadystatechange = xcontentsrecv;
    xhr.open('GET', url, true);
    xhr.send(null);

}

function markPhoto(url) {
    sendGetRequest(url, respLikes)
}

function markPlace(url) {
     markPhoto(url);
}

function respLikes() {
    if (this.readyState == 4) {
        if (this.status == 200) {
            let _r = JSON.parse(this.responseText);

            switch(_r['target']) {
                case 'photo':
                        let _pan = document.querySelector(`.photodata.ph_${_r['id']}`);
                        if (_pan != null) {
                            _pan.querySelector('.like').innerHTML = _r['likes'];
                            _pan.querySelector('.dislike').innerHTML = _r['dislikes'];
                            _pan.querySelector('.ph_rating').innerHTML = _r['rating'];
                        }
                    break;
                case 'place':
                        document.querySelector('.plike').innerHTML = _r['likes'];
                        document.querySelector('.pdislike').innerHTML = _r['dislikes'];
                    break;

            }

            document.querySelector('.prating').innerHTML = _r['placerating'];

        } else
            alert('HTTP request error.');
    }
}