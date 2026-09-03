@extends('layouts.guest')

@section('content')

 <main class="section">
    <div class="container" style="max-width:480px">
      <div class="card" style="padding:2rem">
        <h1 style="font-size:1.5rem;margin-bottom:0.25rem;text-align:center">Create Account</h1>
        <p class="text-muted text-center" style="margin-bottom:1.5rem">For retail customers and businesses</p>
        <form onsubmit="event.preventDefault(); window.location.href='dashboard.html'">
          <div class="form-group">
            <label class="form-label">Account Type</label>
            <div class="flex gap-3" style="flex-wrap:wrap">
              <label style="display:flex;align-items:center;gap:0.375rem;cursor:pointer"><input type="radio" name="type" value="retail" checked> Retail</label>
              <label style="display:flex;align-items:center;gap:0.375rem;cursor:pointer"><input type="radio" name="type" value="store"> Medical Store</label>
              <label style="display:flex;align-items:center;gap:0.375rem;cursor:pointer"><input type="radio" name="type" value="clinic"> Clinic</label>
              <label style="display:flex;align-items:center;gap:0.375rem;cursor:pointer"><input type="radio" name="type" value="hospital"> Hospital</label>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="reg-name">Full Name / Business Name *</label>
            <input type="text" id="reg-name" class="form-input" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="reg-mobile">Mobile Number *</label>
            <input type="tel" id="reg-mobile" class="form-input" required pattern="[0-9]{10}">
          </div>
          <div class="form-group">
            <label class="form-label" for="reg-email">Email (optional)</label>
            <input type="email" id="reg-email" class="form-input">
          </div>
          <div class="form-group">
            <label class="form-label" for="reg-pass">Password *</label>
            <input type="password" id="reg-pass" class="form-input" required minlength="6">
          </div>
          <button type="submit" class="btn btn-primary w-full">Create Account</button>
        </form>
        <p class="text-center text-muted" style="margin-top:1.25rem;font-size:0.875rem">
          Already have an account? <a href="login.html" class="text-primary">Login</a>
        </p>
      </div>
    </div>
  </main>
@endsection