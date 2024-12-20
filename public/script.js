// Smooth Scrolling for Navigation Links
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
document.getElementById('registerButton').addEventListener('click', function (event) {
    event.preventDefault();  // Prevent the default form submission
    window.location.href = 'about.html'; // Redirect to about.html
});
//image slider
    const slider = document.getElementById('slider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;

    const slideWidth = slider.children[0].offsetWidth;

    // Move to the next slide
    nextBtn.addEventListener('click', () => {
        if (currentIndex < slider.children.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Loop back to the first slide
        }
        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    });

    // Move to the previous slide
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = slider.children.length - 1; // Loop to the last slide
        }
        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    });

    // Resize event to adjust slider on window resize
    window.addEventListener('resize', () => {
        slider.style.transform = `translateX(-${currentIndex * slider.children[0].offsetWidth}px)`;
    });
// Form Validation
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const message = document.getElementById('formMessage');
    
    if (nameInput.value.trim() === '' || emailInput.value.trim() === '') {
        message.textContent = 'All fields are required.';
        message.style.color = 'red';
        return;
    }

    message.textContent = 'Thank you for registering!';
    message.style.color = 'green';

    // Reset form fields
    nameInput.value = '';
    emailInput.value = '';
});
const saveInput = () => {
    const name = document.getElementById('name').value;
    sessionStorage.setItem('name', name);
};
window.onload = () => {
    const name = sessionStorage.getItem('name');
    if (name) document.getElementById('name').value = name;
};
const validateAndProceed = (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    if (name) {
        sessionStorage.setItem('name', name);
        window.location.href = "about.html";
    } else {
        alert('Please fill in the required field.');
    }
};
const compileData = () => {
    const name = sessionStorage.getItem('name');
    const email = sessionStorage.getItem('email');
    console.log(`Name: ${name}, Email: ${email}`); // Replace with submission logic
};


