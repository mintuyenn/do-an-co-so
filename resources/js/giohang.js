document.addEventListener("DOMContentLoaded", function () {
    // Cập nhật số lượng sản phẩm
    document
        .querySelectorAll(".increase-qty, .decrease-qty")
        .forEach((button) => {
            button.addEventListener("click", function () {
                let row = this.closest("tr");
                let input = row.querySelector(".quantity");
                let totalPriceCell = row.querySelector(".total-price");
                let newQty = parseInt(input.value);
                let price = parseInt(input.dataset.price);

                if (this.classList.contains("increase-qty")) {
                    newQty += 1;
                } else if (this.classList.contains("decrease-qty")) {
                    newQty = Math.max(newQty - 1, 1);
                }

                input.value = newQty;
                totalPriceCell.innerText =
                    (newQty * price).toLocaleString() + " VND";

                // Gửi yêu cầu cập nhật lên server
                updateCart(input.dataset.id, newQty);
            });
        });

    // Xóa sản phẩm khỏi giỏ hàng
    document.querySelectorAll(".delete-item").forEach((button) => {
        button.addEventListener("click", function () {
            let row = this.closest("tr");
            let itemId = row.querySelector(".quantity").dataset.id;

            fetch("/giohang/xoa/" + itemId, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        row.remove();
                        calculateGrandTotal();
                    } else {
                        alert("Xóa sản phẩm thất bại!");
                    }
                })
                .catch((error) =>
                    console.error("Lỗi khi xóa sản phẩm:", error)
                );
        });
    });

    // Hàm cập nhật giỏ hàng trong database
    function updateCart(itemId, newQty) {
        fetch("/giohang/capnhat/" + itemId, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({ id: itemId, soluong: newQty }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    calculateGrandTotal();
                } else {
                    alert("Cập nhật thất bại!");
                }
            })
            .catch((error) =>
                console.error("Lỗi khi cập nhật giỏ hàng:", error)
            );
    }

    // Hàm tính tổng tiền giỏ hàng
    function calculateGrandTotal() {
        let total = 0;
        document.querySelectorAll(".total-price").forEach((element) => {
            total += parseInt(element.textContent.replace(/[^0-9]/g, "")) || 0;
        });
        document.getElementById("grand-total").textContent =
            total.toLocaleString() + " VND";
    }
});
