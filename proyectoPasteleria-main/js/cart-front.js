// js/cart-front.js

class CartManager {
    constructor() {
        this.cart = JSON.parse(localStorage.getItem('carrito')) || [];
        this.init();
    }

    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.updateUI();

            // VINCULAR BOTÓN DE CHECKOUT DEL SIDEBAR
            const checkoutBtn = document.getElementById('checkout-btn');
            if (checkoutBtn) {
                checkoutBtn.addEventListener('click', () => {
                    if (this.cart.length > 0) {
                        const totalCalculado = this.calculateTotal();
                        
                        // 1. Guardar en localStorage para que pago.html y admin.html lo lean
                        localStorage.setItem('totalPedido', totalCalculado);
                        localStorage.setItem('productosPedido', JSON.stringify(this.cart));
                        
                        // 2. Redirigir a la pantalla de pago
                        window.location.href = 'pago.html';
                    }
                });
            }
        });
    }

    addItem(id, name, price) {
        const existingItem = this.cart.find(item => item.id === id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.cart.push({
                id: id,
                name: name,
                price: Number(price),
                quantity: 1
            });
        }

        this.saveCart();
        this.updateUI();
        this.toggleSidebar(true);
    }

    changeQuantity(id, amount) {
        const item = this.cart.find(i => i.id === id);
        if (item) {
            item.quantity += amount;
            if (item.quantity <= 0) {
                this.removeItem(id);
                return;
            }
        }
        this.saveCart();
        this.updateUI();
    }

    removeItem(id) {
        this.cart = this.cart.filter(item => item.id !== id);
        this.saveCart();
        this.updateUI();
    }

    saveCart() {
        localStorage.setItem('carrito', JSON.stringify(this.cart));
    }

    calculateTotal() {
        return this.cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    countItems() {
        return this.cart.reduce((count, item) => count + item.quantity, 0);
    }

    toggleSidebar(open) {
        const sidebar = document.getElementById('cart-sidebar');
        if (sidebar) {
            if (open) {
                sidebar.classList.add('active');
            } else {
                sidebar.classList.remove('active');
            }
        }
    }

    updateUI() {
        const cartBadge = document.getElementById('cart-badge');
        if (cartBadge) {
            cartBadge.textContent = this.countItems();
        }

        const cartList = document.getElementById('cart-items-list');
        if (cartList) {
            if (this.cart.length === 0) {
                cartList.innerHTML = '<p class="empty-cart-text text-center text-muted my-4">No has agregado delicias aún.</p>';
            } else {
                let html = '';
                this.cart.forEach(item => {
                    html += `
                        <div class="cart-item d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                            <div>
                                <h6 class="mb-0 fw-bold">${item.name}</h6>
                                <small class="text-muted">₡${item.price.toLocaleString("es-CR")} c/u</small>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="cartManager.changeQuantity(${item.id}, -1)">-</button>
                                <span class="fw-bold">${item.quantity}</span>
                                <button class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="cartManager.changeQuantity(${item.id}, 1)">+</button>
                                <button class="btn btn-sm btn-outline-danger py-0 px-2 ms-1" onclick="cartManager.removeItem(${item.id})">&times;</button>
                            </div>
                        </div>
                    `;
                });
                cartList.innerHTML = html;
            }
        }

        const totalPriceEl = document.getElementById('cart-total-price');
        if (totalPriceEl) {
            totalPriceEl.textContent = '₡' + this.calculateTotal().toLocaleString("es-CR");
        }

        const checkoutBtn = document.getElementById('checkout-btn');
        if (checkoutBtn) {
            checkoutBtn.disabled = this.cart.length === 0;
        }
    }
}

const cartManager = new CartManager();