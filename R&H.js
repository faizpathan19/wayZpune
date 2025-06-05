function addReview(button) {
    let input = button.previousElementSibling;
    let reviewText = input.value.trim();
    
    if (reviewText !== "") {
        let review = document.createElement("p");
        review.innerHTML = `<strong>You:</strong> ${reviewText} ⭐⭐⭐⭐⭐`;
        button.parentElement.insertBefore(review, input);
        input.value = "";
    } else {
        alert("Please enter a review before submitting.");
    }
}
