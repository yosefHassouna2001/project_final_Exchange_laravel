
let recieving = document.querySelector('.recieving');

let body = document.querySelector('body')
let modalbackdrop = document.querySelector('.modal-backdrop');

recieving.onclick =_=>{
document.querySelector('#recieveModal').classList=('show','modal');
body.classList=('modal-open');
body.style.overflow =('hidden');
body.style.paddingRight =('0px');
document.querySelector('#recieveModal').style.display= 'block';
modalbackdrop.classList=('modal-backdrop');
modalbackdrop.style.display=('block');
modalbackdrop.style.opacity = '0.5';

}

let closee =document.querySelector('.close');

closee.onclick=_=>{
    document.querySelector('#recieveModal').classList=('hide','modal');
    body.classList=('');
    body.style=('');
    document.querySelector('#recieveModal').style.display= 'none';
    modalbackdrop.style.display=('none');
    modalbackdrop.style.classList=('');
                        
}


