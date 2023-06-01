// Retrieve the CGPA result from the URL parameter
const urlParams = new URLSearchParams(window.location.search);
const cgpaResult = urlParams.get('cgpa');

// Display the CGPA result on the webpage
if (cgpaResult) {
    const resultDiv = document.getElementById('cgpaResult');
    resultDiv.textContent = `Your CGPA is: ${cgpaResult}`;
}
