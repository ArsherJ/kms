document.addEventListener("click", function (e) {
    if (e.target.classList.contains("image-item")) {
        const src = e.target.getAttribute("src")
        const height = e.target.getAttribute("height")
        const width = e.target.getAttribute("width")

        document.querySelector(".modal-img").src = src
        document.querySelector(".modal-img").height = height
        document.querySelector(".modal-img").width = width
        const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'))
        myModal.show()
    }
})