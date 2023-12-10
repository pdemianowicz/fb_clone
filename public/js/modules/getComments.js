async function getComments(post, id) {
  const url = "./includes/getComments.inc.php";
  const options = {
    method: "post",
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: JSON.stringify({ postId: id }),
  };

  await fetch(url, options)
    .then((response) => response.text())
    .then((data) => {
      post.innerHTML = data;
    })
    .catch((error) => console.error("Failed to fetch page: ", error));
}

export default getComments;
