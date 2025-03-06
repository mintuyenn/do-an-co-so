import { useEffect, useState } from "react";

const CartPage = () => {
    const [cart, setCart] = useState([]);
    const [total, setTotal] = useState(0);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/giohang")
            .then((response) => response.json())
            .then((data) => {
                setCart(data.cart);
                setTotal(data.total);
            })
            .catch((error) => console.error("Lỗi tải giỏ hàng:", error));
    }, []);

    const updateQuantity = (id, quantity) => {
        fetch(`http://127.0.0.1:8000/api/giohang/capnhat/${id}`, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ quantity }),
        }).then(() => {
            setCart(
                cart.map((item) =>
                    item.id === id ? { ...item, quantity } : item
                )
            );
            setTotal(
                cart.reduce((sum, item) => sum + item.price * item.quantity, 0)
            );
        });
    };

    const removeItem = (id) => {
        fetch(`http://127.0.0.1:8000/api/giohang/xoa/${id}`, {
            method: "DELETE",
        }).then(() => {
            const updatedCart = cart.filter((item) => item.id !== id);
            setCart(updatedCart);
            setTotal(
                updatedCart.reduce(
                    (sum, item) => sum + item.price * item.quantity,
                    0
                )
            );
        });
    };

    return (
        <div className="container mx-auto p-4">
            <h2 className="text-xl font-bold mb-4">Giỏ hàng</h2>
            <div className="bg-white shadow-md rounded-lg p-4">
                {cart.length === 0 ? (
                    <p>Giỏ hàng trống</p>
                ) : (
                    cart.map((item) => (
                        <div
                            key={item.id}
                            className="flex justify-between border-b py-2"
                        >
                            <span>
                                {item.name} - {item.price}₫
                            </span>
                            <div>
                                <input
                                    type="number"
                                    value={item.quantity}
                                    onChange={(e) =>
                                        updateQuantity(
                                            item.id,
                                            Number(e.target.value)
                                        )
                                    }
                                    className="border p-1 w-16"
                                    min="1"
                                />
                                <button
                                    onClick={() => removeItem(item.id)}
                                    className="ml-2 text-red-500"
                                >
                                    Xóa
                                </button>
                            </div>
                        </div>
                    ))
                )}
                <div className="text-right mt-4">
                    <strong>Tổng tiền: {total}₫</strong>
                </div>
                <button className="bg-blue-500 text-white px-4 py-2 mt-4 rounded">
                    Thanh toán
                </button>
            </div>
        </div>
    );
};

export default CartPage;
