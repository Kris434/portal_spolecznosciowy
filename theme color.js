function switchTheme() {
    var currentColor = document.body.style.backgroundColor;
    if (currentColor === 'white' || currentColor === '') {
      document.body.style.backgroundColor = 'black';
      document.body.style.color = 'white';
    } else {
      document.body.style.backgroundColor = 'white';
      document.body.style.color = 'black';
    }
  }
 // zeby działało trzeba gdzies umiescic przycisk z tą komendą: switchTheme();