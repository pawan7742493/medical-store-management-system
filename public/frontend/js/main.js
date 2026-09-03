// Lakhadatar Pharma - Main UI interactions

document.addEventListener('DOMContentLoaded', () => {
  // Mobile menu
  const menuBtn = document.querySelector('.menu-btn');
  const mobileMenu = document.querySelector('.mobile-menu');
  const closeMenu = document.querySelector('.close-menu');
  
  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => mobileMenu.classList.add('open'));
    if (closeMenu) closeMenu.addEventListener('click', () => mobileMenu.classList.remove('open'));
    mobileMenu.addEventListener('click', (e) => {
      if (e.target === mobileMenu) mobileMenu.classList.remove('open');
    });
  }
  
  // Search overlay
  const searchBtns = document.querySelectorAll('.search-btn');
  const searchOverlay = document.querySelector('.search-overlay');
  const closeSearch = document.querySelector('.close-search');
  const searchInput = document.querySelector('.search-overlay input');
  
  searchBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (searchOverlay) {
        searchOverlay.classList.add('open');
        setTimeout(() => searchInput?.focus(), 100);
      }
    });
  });
  
  if (closeSearch) closeSearch.addEventListener('click', () => searchOverlay?.classList.remove('open'));
  if (searchOverlay) {
    searchOverlay.addEventListener('click', (e) => {
      if (e.target === searchOverlay) searchOverlay.classList.remove('open');
    });
  }
  
  // Search form
  const searchForm = document.querySelector('.search-form');
  if (searchForm) {
    searchForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const q = searchInput?.value.trim();
      if (q) {
        window.location.href = `/pages/medicines.html?q=${encodeURIComponent(q)}`;
      }
    });
  }
  
  // Add to cart buttons
  document.querySelectorAll('[data-add-to-cart]').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const product = {
        id: btn.dataset.id,
        name: btn.dataset.name,
        brand: btn.dataset.brand || '',
        price: parseFloat(btn.dataset.price),
        image: btn.dataset.image || '',
        qty: 1
      };
      Cart.add(product);
      
      // Visual feedback
      const original = btn.innerHTML;
      btn.innerHTML = '✓ Added';
      btn.disabled = true;
      setTimeout(() => {
        btn.innerHTML = original;
        btn.disabled = false;
      }, 1200);
    });
  });
  
  // Quantity controls on product detail
  const qtyInput = document.querySelector('.qty-input');
  const qtyMinus = document.querySelector('.qty-minus');
  const qtyPlus = document.querySelector('.qty-plus');
  
  if (qtyMinus && qtyPlus && qtyInput) {
    qtyMinus.addEventListener('click', () => {
      let v = parseInt(qtyInput.value) || 1;
      if (v > 1) qtyInput.value = v - 1;
    });
    qtyPlus.addEventListener('click', () => {
      let v = parseInt(qtyInput.value) || 1;
      qtyInput.value = v + 1;
    });
  }
  
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});

// Sample product data for demo
const sampleMedicines = [
  { id: 'm1', name: 'Paracetamol 500mg', brand: 'XYZ Pharma', price: 25, stock: true, rx: false, category: 'Pain Relief' },
  { id: 'm2', name: 'Amoxicillin 250mg', brand: 'MediCare Labs', price: 85, stock: true, rx: true, category: 'Antibiotics' },
  { id: 'm3', name: 'Vitamin C 1000mg', brand: 'HealthPlus', price: 120, stock: true, rx: false, category: 'Vitamins' },
  { id: 'm4', name: 'Omeprazole 20mg', brand: 'GastroCare', price: 65, stock: true, rx: true, category: 'Digestive Care' },
  { id: 'm5', name: 'Cetirizine 10mg', brand: 'AllergyFree', price: 35, stock: true, rx: false, category: 'Allergy' },
  { id: 'm6', name: 'Ibuprofen 400mg', brand: 'PainAway', price: 45, stock: false, rx: false, category: 'Pain Relief' },
  { id: 'm7', name: 'Metformin 500mg', brand: 'DiabeCare', price: 55, stock: true, rx: true, category: 'Diabetes' },
  { id: 'm8', name: 'Azithromycin 500mg', brand: 'MediCare Labs', price: 95, stock: true, rx: true, category: 'Antibiotics' },
];

const sampleProducts = [
  { id: 'p1', name: 'Digital Thermometer', brand: 'HealthTech', price: 299, stock: true },
  { id: 'p2', name: 'Blood Pressure Monitor', brand: 'MediCheck', price: 1499, stock: true },
  { id: 'p3', name: 'Pulse Oximeter', brand: 'OxyCare', price: 899, stock: true },
  { id: 'p4', name: 'First Aid Kit (Basic)', brand: 'SafeCare', price: 450, stock: true },
  { id: 'p5', name: 'Surgical Face Mask (50pcs)', brand: 'ProtectPlus', price: 199, stock: true },
  { id: 'p6', name: 'Hand Sanitizer 500ml', brand: 'CleanHands', price: 149, stock: true },
];
