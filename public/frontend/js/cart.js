// Lakhadatar Pharma - Cart Management (localStorage based for frontend demo)
const Cart = {
  key: 'lp_cart',
  
  get() {
    try {
      return JSON.parse(localStorage.getItem(this.key)) || [];
    } catch {
      return [];
    }
  },
  
  save(items) {
    localStorage.setItem(this.key, JSON.stringify(items));
    this.updateBadge();
    window.dispatchEvent(new CustomEvent('cartUpdated'));
  },
  
  add(product) {
    const items = this.get();
    const existing = items.find(i => i.id === product.id);
    if (existing) {
      existing.qty += product.qty || 1;
    } else {
      items.push({ ...product, qty: product.qty || 1 });
    }
    this.save(items);
    return items;
  },
  
  updateQty(id, qty) {
    let items = this.get();
    if (qty <= 0) {
      items = items.filter(i => i.id !== id);
    } else {
      const item = items.find(i => i.id === id);
      if (item) item.qty = qty;
    }
    this.save(items);
    return items;
  },
  
  remove(id) {
    const items = this.get().filter(i => i.id !== id);
    this.save(items);
    return items;
  },
  
  clear() {
    this.save([]);
  },
  
  count() {
    return this.get().reduce((sum, i) => sum + i.qty, 0);
  },
  
  subtotal() {
    return this.get().reduce((sum, i) => sum + (i.price * i.qty), 0);
  },
  
  updateBadge() {
    const badges = document.querySelectorAll('.cart-badge');
    const count = this.count();
    badges.forEach(b => {
      b.textContent = count > 99 ? '99+' : count;
      b.style.display = count > 0 ? 'flex' : 'none';
    });
  }
};

// Init badge on load
document.addEventListener('DOMContentLoaded', () => Cart.updateBadge());
