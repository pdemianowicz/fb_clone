if (window.location.pathname === "/") {
  document.querySelector(".navigation_show-more").addEventListener("click", () => {
    let htmlSegment = `
      <li><a href="#"><img src="./img/Jr0q8qKF2-Y.png" alt="...">Centrum nauki o klimacie</a></li>
      <li><a href="#"><img src="./img/CwKNCefmHON.png" alt="...">Centrum reklam</a></li>
      <li><a href="#"><img src="./img/games.png" alt="...">Graj w gry</a></li>
      <li><a href="#"><img src="./img/ATlxuj_J5ty.png" alt="...">Menadżer reklam</a></li>
      <li><a href="#"><img src="./img/messenger.png" alt="...">Messenger</a></li>
      <li><a href="#"><img src="./img/9_JCo3JwET_.png" alt="...">Meta Quest</a></li>
      <li><a href="#"><img src="./img/x2_LFd7gCqg.png" alt="...">Ostatnia aktywność dotycząca reklam</a></li>
      <li><a href="#"><img src="./img/fNPcDZC-2PD.png" alt="...">Reagowanie na sytuacje kryzysowe</a></li>
      <li><a href="#"><img src="./img/sites.png" alt="...">Strony</a></li>
      <li><a href="#"><img src="./img/fGWbDwbx9W4.png" alt="...">Wideo z grami</a></li>
      <li><a href="#"><img src="./img/WMOYDeEqIYv.png" alt="...">Wydarzenia</a></li>
      <li><a href="#"><img src="./img/GJ4EaivDaSj.png" alt="...">Zamówienia i płatnoś<cite></cite></a></li>
      <li><a href="#"><img src="./img/heart.png" alt="...">Zbiórki pieniędzy</a></li>`;

    const ul = document.querySelector(".left_nav");
    const showMoreButton = document.querySelector(".navigation_show-more");

    if (showMoreButton.textContent === "Zobacz więcej") {
      ul.innerHTML += htmlSegment;
      showMoreButton.textContent = "Pokaż mniej";
    } else {
      for (let i = 0; i < 13; i++) {
        ul.removeChild(ul.lastElementChild);
      }
      showMoreButton.textContent = "Zobacz więcej";
    }
  });
}

// const postAction = document.querySelectorAll(".post-header__edit");
// postAction.forEach((action) => {
//   action.addEventListener("click", () => {
//     let htmlSegment = `
//     <div class="postAction-modal" id="postAction-modal" data-is-open="false">
//       <form class="postAction-modal__wrap" action="includes/postActions.inc.php" method="post">
//         <button type="submit" name="action" value="report">Zgłoś post</button>
//         <button type="submit" name="action" value="edit">Edytuj post</button>
//         <button type="submit" name="action" value="delete">Usuń post na zawsze</button>
//       </form>
//     </div>`;

//     action.innerHTML += htmlSegment;
//   });
// });

// modals
const buttons = document.querySelectorAll("[data-modal-id]");
buttons.forEach((button) => {
  button.addEventListener("click", () => {
    const modalId = button.dataset.modalId;
    const modal = document.getElementById(modalId);
    modal.setAttribute("data-is-open", "true");
    document.querySelector("body").setAttribute("no-scroll", "");
    modal.querySelector(".modal__close").addEventListener("click", () => {
      modal.setAttribute("data-is-open", "false");
      document.querySelector("body").removeAttribute("no-scroll");
    });

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.setAttribute("data-is-open", "false");
        document.querySelector("body").removeAttribute("no-scroll");
      }
    });
  });
});

// dropdown
const drops = document.querySelectorAll("[data-dropdown-id]");

drops.forEach((drop) => {
  drop.addEventListener("click", () => {
    const modalId = drop.dataset.dropdownId;
    const modal = document.getElementById(modalId);
    if (modal.dataset.isOpen === "true") {
      modal.setAttribute("data-is-open", "false");
    } else {
      modal.setAttribute("data-is-open", "true");
    }
  });
});

document.addEventListener("click", (e) => {
  drops.forEach((drop) => {
    const modalId = drop.dataset.dropdownId;
    const modal = document.getElementById(modalId);

    if (modal.dataset.isOpen === "true" && !drop.contains(e.target) && !modal.contains(e.target)) {
      modal.dataset.isOpen = "false";
    }
  });
});

document.querySelectorAll(".post").forEach((post) => {
  post.addEventListener("click", (e) => {
    const target = e.target;
    const action = target.dataset.action;

    // console.log(target);

    if (action === "like") {
      const id = post.dataset.postId;
      const dataPlaceholder = post.querySelector(".post-body__likes");
      const like = post.querySelector("[data-liked]");
      const type = "post";

      setLike(id, type, dataPlaceholder, like);
    }

    if (action === "comment") {
      const id = post.dataset.postId;
      const postComments = post.querySelector(".comments");

      // getComments(postComments, id);
      loadComments(postComments, id);
    }

    if (action === "share") return;

    if (action === "like-com") {
      const comment = target.closest(".comment");
      if (comment) {
        const id = comment.dataset.commentId;
        const dataPlaceholder = comment.querySelector(".comment__likes");
        const like = target;
        const type = "comment";

        setLike(id, type, dataPlaceholder, like);
      }
    }

    if (action === "reply") {
      const comment = target.closest(".comment");
      if (comment) {
        const postId = post.dataset.postId;
        const commentId = comment.dataset.commentId;

        showReplyField(comment, postId, commentId);
      }
    }

    if (action === "delete") {
      const comment = target.closest(".comment");
      if (comment) {
        const postId = post.dataset.postId;
        const commentId = comment.dataset.commentId;

        if (confirm("Czy na pewno chcesz usunąć ten komentarz?")) {
          const data = new FormData();
          data.append("commentId", commentId);

          // Wyślij żądanie usunięcia komentarza na serwer za pomocą AJAX
          fetch("/deleteComment", {
            method: "POST",
            body: data,
          })
            .then((response) => response.json())
            .then((result) => {
              console.log(result);
              if (result.success) {
                // Usunięto komentarz z sukcesem, możesz usunąć go z widoku na stronie
                // comment.remove();
                location.reload();
              } else {
                // Wyświetl komunikat o błędzie
                // alert(result.message);
              }
            })
            .catch((error) => {
              console.error("Błąd AJAX:", error);
            });
        }
      }
    }

    if (action === "commentSubmit") {
    }
  });
});

function setLike(id, type, dataPlaceholder, like) {
  const url = "/setLike";
  const options = {
    method: "post",
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `postId=${id}&type=${type}`,
  };

  fetch(url, options)
    .then((response) => response.text())
    .then((data) => {
      dataPlaceholder.innerHTML = data;

      if (like.getAttribute("data-liked") === "true") {
        like.setAttribute("data-liked", "false");
      } else {
        like.setAttribute("data-liked", "true");
      }
    })
    .catch((error) => console.error("Failed to fetch page: ", error));
}

// async function loadComments(post, postId) {
//   const url = `/loadComments?id=${postId}`;
//   const options = {
//     method: "POST",
//     headers: {
//       "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
//     },
//     body: `postId=${postId}`,
//   };

//   await fetch(url, options)
//     .then((response) => response.text())
//     .then((data) => {
//       post.innerHTML = data;
//       // setup(post, id);
//     })
//     .catch((error) => console.error("Failed to fetch comments: ", error));
// }

function loadComments(post, postId) {
  fetch(`/loadComments?id=${postId}`)
    .then((response) => response.text())
    .then((data) => {
      post.innerHTML = data;
    })
    .catch((error) => console.error("Failed to fetch comments:", error));
}

function showReplyField(post, postId, commentId) {
  const url = "./includes/showReplyField.inc.php";
  const data = {
    postId: postId,
    commentId: commentId,
  };
  const options = {
    method: "post",
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: JSON.stringify(data),
  };

  fetch(url, options)
    .then((response) => response.text())
    .then((data) => {
      post.insertAdjacentHTML("beforeend", data);
    })
    .catch((error) => console.error("Failed to fetch page: ", error));
}

if (window.location.pathname === "/profile") {
  setupDragAndDrop();
}
function setupDragAndDrop() {
  const dropContainer = document.getElementById("dropcontainer");
  const fileInput = document.getElementById("images");

  dropContainer.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  ["dragenter", "dragleave"].forEach((eventType) => {
    dropContainer.addEventListener(eventType, () => {
      dropContainer.classList.toggle("drag-active", eventType === "dragenter");
    });
  });

  dropContainer.addEventListener("drop", (e) => {
    e.preventDefault();
    dropContainer.classList.remove("drag-active");
    fileInput.files = e.dataTransfer.files;
  });
}

const imageInput = document.getElementById("imageInput");
const imagePreview = document.getElementById("imagePreview");

imageInput.addEventListener("change", (event) => {
  const selectedFile = event.target.files[0];

  if (selectedFile) {
    const reader = new FileReader();

    reader.onload = (e) => {
      const imageUrl = e.target.result;
      imagePreview.innerHTML = `<img src="${imageUrl}" alt="Image Preview">`;
    };

    reader.readAsDataURL(selectedFile);
  } else {
    imagePreview.innerHTML = "";
  }
});

function setup(post, id) {
  const commentForm = document.getElementById("comment-form");
  console.log(commentForm);
  commentForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(commentForm);

    fetch("includes/setComments.inc.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          getComments(post, id);
          // Jeśli operacja zakończyła się sukcesem, możesz zaktualizować interfejs użytkownika
          // np. dodać nowy komentarz do listy komentarzy
        } else {
          const commentError = document.getElementById("comment-error");
          commentError.textContent = data.message;
          commentForm.classList.add("error");
        }
      })
      .catch((error) => {
        console.error("AJAX Error:", error);
      });
  });
}

//
function confirmDelete() {
  var deleteAvatar = document.querySelector('button[name="delete_avatar"]');
  if (deleteAvatar) {
    var shouldDelete = confirm("Czy na pewno chcesz usunąć swój avatar?");
    return shouldDelete;
  }
  return true;
}
