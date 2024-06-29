document.addEventListener("DOMContentLoaded", function () {
    const generateButton = document.getElementById("generateButton");
    const squareContainer = document.getElementById("squareContainer");

    generateButton.addEventListener("click", function () {
        const squareCountInput = document.getElementById("squareCount");
        const squareCount = parseInt(squareCountInput.value);
        squareContainer.innerHTML = "";
        for (let i = 0; i < squareCount; i++) {
            const square = document.createElement("div");
            square.className = "square";
            squareContainer.appendChild(square);
        }
    });
});
