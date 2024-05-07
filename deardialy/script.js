document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('.btn');

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});



// script.js

// ... existing code ...

// Handle form submission
const diaryForm = document.getElementById('diaryForm');
diaryForm.addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the selected mood value
  const moodSelect = document.getElementById('mood');
  const selectedMood = moodSelect.value;

  // Get the selected color value
  const colorInput = document.getElementById('color');
  const selectedColor = colorInput.value;

  // Get the character SVG elements
  const characterCircle = characterSvg.querySelector('circle');
  const characterPath = characterSvg.querySelector('path');

  // Update the character's reaction and color based on the selected mood and color
  switch (selectedMood) {
    case 'Happy':
      characterCircle.setAttribute('fill', selectedColor);
      characterPath.setAttribute('d', 'M40 60 Q50 70 60 60');
      break;
    case 'Sad':
      characterCircle.setAttribute('fill', selectedColor);
      characterPath.setAttribute('d', 'M40 60 Q50 50 60 60');
      break;
    case 'Angry':
      characterCircle.setAttribute('fill', selectedColor);
      characterPath.setAttribute('d', 'M40 60 Q50 70 60 50');
      break;
    case 'Excited':
      characterCircle.setAttribute('fill', selectedColor);
      characterPath.setAttribute('d', 'M40 60 Q50 70 60 40');
      break;
    default:
        break;
  }

  // Display success message
  const successMessage = document.getElementById('successMessage');
  successMessage.classList.remove('hidden');

  // Reset the form
  diaryForm.reset();
});


 // Profile Information
const profileInfo = document.querySelector('.profile-info');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const editProfileBtn = document.getElementById('editProfileBtn');
const saveProfileBtn = document.getElementById('saveProfileBtn');

// Function to fetch and display user profile information
function fetchProfileInfo() {
  // Simulating fetching data from the server
  const profileData = {
    name: 'John Doe',
    email: 'johndoe@example.com'
  };

  // Update the input fields with the retrieved data
  nameInput.value = profileData.name;
  emailInput.value = profileData.email;
}

// Call the fetchProfileInfo function to display initial profile information
fetchProfileInfo();

// Function to enable editing of profile information
function enableProfileEditing() {
  nameInput.removeAttribute('readonly');
  emailInput.removeAttribute('readonly');
  editProfileBtn.style.display = 'none';
  saveProfileBtn.style.display = 'inline-block';
}

// Function to save the edited profile information
function saveProfileInfo() {
  // Get the updated values from the input fields
  const updatedName = nameInput.value;
  const updatedEmail = emailInput.value;

  // Simulating saving data to the server
  // You can add your own implementation here

  // Disable editing and update the buttons
  nameInput.setAttribute('readonly', true);
  emailInput.setAttribute('readonly', true);
  editProfileBtn.style.display = 'inline-block';
  saveProfileBtn.style.display = 'none';
}

// Add event listeners to the buttons
editProfileBtn.addEventListener('click', enableProfileEditing);
saveProfileBtn.addEventListener('click', saveProfileInfo);


// Previous Journal Entries
const journalEntriesList = document.getElementById('journalEntries');

// Function to fetch and display previous journal entries
function fetchJournalEntries() {
  // Simulating fetching journal entries from the server
  const journalEntriesData = [
    { title: 'Entry 1', content: 'This is the content of entry 1.' },
    { title: 'Entry 2', content: 'This is the content of entry 2.' },
    { title: 'Entry 3', content: 'This is the content of entry 3.' }
  ];

  // Clear the existing list
  journalEntriesList.innerHTML = '';

  // Generate the list items for each journal entry
  journalEntriesData.forEach(entry => {
    const listItem = document.createElement('li');
    listItem.innerHTML = `<h3>${entry.title}</h3><p>${entry.content}</p>`;
    journalEntriesList.appendChild(listItem);
  });
}

// Call the fetchJournalEntries function to display previous entries
fetchJournalEntries();