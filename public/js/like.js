document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelector(".like-button")
        .addEventListener("click", function (event) {
            console.log("Clicked");
            event.preventDefault();
            const postId = this.getAttribute("data-post-id");
            const icon = this.querySelector("i");
            fetch(`/posts/${postId}/like`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === "liked") {
                        icon.classList.add("fas");
                        icon.classList.remove("far");
                    } else {
                        icon.classList.remove("fas");
                        icon.classList.add("far");
                    }
                })
                .catch((error) => {
                    console.error("Error", error);
                });
        });
});
