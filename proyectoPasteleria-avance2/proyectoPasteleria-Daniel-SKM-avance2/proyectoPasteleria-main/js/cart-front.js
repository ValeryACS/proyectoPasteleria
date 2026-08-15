
class CartManager {
    constructor() {
        this.items = [];
        this.total = 0;
    }

  toggleSidebar(show) {
        const sidebar = document.getElementById('cart-sidebar');
        if (!sidebar) return;

        if (show) {
            sidebar.classList.add('open');
        } else {
            sidebar.classList.remove('open');
        }
    }

    addItem(id, name, price) {
        const existingItem = this.items.find(item => item.id === id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push({
                id: id,
                name: name,
                price: price,
                quantity: 1
            });
        }

         this.updateUI();
        this.toggleSidebar(true);
    }

   
    removeItem(id) {
        this.items = this.items.filter(item => item.id !== id);
        this.updateUI();
    }

    
     
    updateUI() {
        const cartItemsList = document.getElementById('cart-items-list');
        const cartBadge = document.getElementById('cart-badge');
        const cartTotalPrice = document.getElementById('cart-total-price');
        const checkoutBtn = document.getElementById('checkout-btn');

        if (!cartItemsList) return;

     
        cartItemsList.innerHTML = '';

      
        if (this.items.length === 0) {
            cartItemsList.innerHTML = '<p class="empty-cart-text">No has agregado delicias aún.</p>';
            if (cartBadge) cartBadge.innerText = '0';
            if (cartTotalPrice) cartTotalPrice.innerText = '₡0';
            if (checkoutBtn) checkoutBtn.disabled = true;
            return;
        }

     
        this.total = 0;
        let totalCount = 0;

        this.items.forEach(item => {
            const itemSubtotal = item.price * item.quantity;
            this.total += itemSubtotal;
            totalCount += item.quantity;

            const itemRow = document.createElement('div');
            itemRow.className = 'cart-item d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom';
            itemRow.innerHTML = `
                <div class="cart-item-info">
                    <h6 class="mb-0 fw-bold">${item.name}</h6>
                    <small class="text-muted">₡${item.price.toLocaleString('es-CR')} x ${item.quantity}</small>
                </div>
                <div class="d-flex align-items-center">
                    <span class="me-3 fw-bold text-rosa">₡${itemSubtotal.toLocaleString('es-CR')}</span>
                    <button class="btn btn-sm btn-outline-danger py-0 px-2" onclick="cartManager.removeItem(${item.id})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;
            cartItemsList.appendChild(itemRow);
        });

       
        if (cartBadge) cartBadge.innerText = totalCount;
        if (cartTotalPrice) cartTotalPrice.innerText = `₡${this.total.toLocaleString('es-CR')}`;
        if (checkoutBtn) checkoutBtn.disabled = false;
    }
}

const cartManager = new CartManager();