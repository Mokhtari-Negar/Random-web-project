document.addEventListener("DOMContentLoaded", () => {
    const decreaseButtons = document.querySelectorAll('.decrease');
    const increaseButtons = document.querySelectorAll('.increase');
    const removeButtons = document.querySelectorAll('.remove-item');
    const totalPriceElement = document.querySelector('.total-price');
    
    const prices = [150000, 120000]; 

    const updateTotalPrice = () => {
        let total = 0;
        const quantities = document.querySelectorAll('.item-quantity');
        quantities.forEach((quantity, index) => {
            total += prices[index] * parseInt(quantity.textContent);
        });
        totalPriceElement.textContent = total.toLocaleString() + ' تومان';
    }

    increaseButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const quantity = button.previousElementSibling;
            quantity.textContent = parseInt(quantity.textContent) + 1;
            updateTotalPrice();
        });
    });

    decreaseButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const quantity = button.nextElementSibling;
            if (parseInt(quantity.textContent) > 1) {
                quantity.textContent = parseInt(quantity.textContent) - 1;
            }
            updateTotalPrice();
        });
    });

    removeButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            button.closest('.cart-item').remove();
            updateTotalPrice();
        });
    });

    updateTotalPrice(); 
});
