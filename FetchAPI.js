import fetch from 'unfetch';

  fetch(http://localhost/portal/portal_spolecznosciowy/api/posts)
  .then(response => response.json())
  .then(posts => {
    
    const container = document.getElementById('posts-container');

    const postElements = posts.map(post => {
      const postElement = document.createElement('div');
      postElement.innerHTML = `
        <h2>${post.title}</h2>
        <p>${post.body}</p>
      `;
      return postElement;
    });

    postElements.forEach(element => container.appendChild(element));
  });



  
