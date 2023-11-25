// Simple PopUp

const profile = document.querySelector('#profile');
const profilePopup = document.querySelector('#profile-popup');

profile.addEventListener('click', togglePopUp);

function togglePopUp() {
    if(profilePopup.style.display === 'grid') {
        profilePopup.style.display = 'none';
    } else {
        profilePopup.style.display = 'grid';                            
        window.addEventListener('click', closePopUp);
    }
}

function closePopUp(e) {
    if(!profile.contains(e.target)) {
        profilePopup.style.display = 'none';
        window.removeEventListener('click', closePopUp);
    }
}