const courseContent = {
    html: {
      title: "Learn HTML",
      content: "HTML (HyperText Markup Language) is the standard language for creating web pages.",
    },
    css: {
      title: "Learn CSS",
      content: "CSS (Cascading Style Sheets) is used for styling web pages.",
    },
    js: {
      title: "Learn JavaScript",
      content: "JavaScript is a programming language for creating dynamic and interactive web content.",
    },
    python: {
      title: "Learn Python",
      content: "Python is a versatile language that you can use for web development, data analysis, AI, and more.",
    },
  };
  
  function showContent(language) {
    const title = courseContent[language].title;
    const content = courseContent[language].content;
  
    document.getElementById("course-title").innerText = title;
    document.getElementById("course-content").innerText = content;
  
    const savedCode = localStorage.getItem(language + "-code");
    document.getElementById("code-area").value = savedCode || "";
    document.getElementById("code-area").dataset.language = language;
  }
  
  function saveCode() {
    const language = document.getElementById("code-area").dataset.language;
    const code = document.getElementById("code-area").value;
  
    if (language) {
      localStorage.setItem(language + "-code", code);
      alert("Code saved for " + language.toUpperCase());
    } else {
      alert("Select a course first!");
    }
  }
  
  function clearCode() {
    const language = document.getElementById("code-area").dataset.language;
  
    if (language) {
      document.getElementById("code-area").value = "";
      localStorage.removeItem(language + "-code");
      alert("Code cleared for " + language.toUpperCase());
    } else {
      alert("Select a course first!");
    }
  }
  function saveCode() {
    const username = prompt("Enter your username:");
    const language = document.getElementById("code-area").dataset.language;
    const code = document.getElementById("code-area").value;
  
    if (username && language) {
      const formData = new FormData();
      formData.append("username", username);
      formData.append("language", language);
      formData.append("code", code);
  
      fetch("http://localhost/save_code.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data);
        })
        .catch((error) => {
          alert("Error: " + error.message);
        });
    } else {
      alert("Please select a course and enter a username.");
    }
  }
    