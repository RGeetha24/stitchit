<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stitch It - Profile</title>
  <link rel="icon" type="image/x-icon" href='{{url("site/assets/image/fav-removebg-preview.png")}}'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    :root {
      --primary-color: #00796b;
      --border-color: #ccc;
      --input-bg: #fff;
      --font-family: 'Inter', sans-serif;
      --text-color: #222;
      --label-color: #666;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: var(--font-family);
      background-color: #fff;
      color: var(--text-color);
      margin: 0;
      padding: 40px 20px;
    }

    .container {
      max-width: 900px;
      margin: 0 auto;
    }

    .back-icon {
      font-size: 24px;
      cursor: pointer;
      color: var(--text-color);
    }

    h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-top: 20px;
    }

    p.subtitle {
      color: var(--label-color);
      margin-bottom: 40px;
    }

    /* Profile Image Section */
    .profile-section {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .profile-pic {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      overflow: hidden;
    }

    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .btn-group {
      display: flex;
      gap: 10px;
    }

    button {
      border: none;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      padding: 10px 16px;
      font-weight: 500;
      font-family: inherit;
    }

    .btn-upload {
      background-color: var(--primary-color);
      color: #fff;
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 10px;
      border-radius: 10px;
    }

    .btn-remove {
      background-color: #f5f5f5;
      color: #333;
    }

    form {
      margin-top: 40px;
    }

    label {
      font-weight: 600;
      color: var(--label-color);
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    select,
    textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid var(--border-color);
      border-radius: 6px;
      background: var(--input-bg);
      font-size: 15px;
    }

    textarea {
      resize: none;
      height: 80px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .col-6 {
      flex: 1 1 calc(50% - 10px);
      min-width: 280px;
    }

    .col-12 {
      width: 100%;
    }

    /* Measurement Section */
    .section-title {
      font-weight: 600;
      font-size: 16px;
      margin-top: 40px;
      margin-bottom: 10px;
    }



    .save-btn:hover {
      background-color: #00665d;
    }

    @media (max-width: 768px) {
      .profile-section {
        flex-direction: column;
        align-items: flex-start;
      }

      .col-6 {
        flex: 1 1 100%;
      }

      .save-btn {
        width: 100%;
      }
    }
    .btn-right {
    width: 100%;
    text-align: right;  /* Align button to the right */
}

.save-btn {
    background: #00897B;
    color: #fff;
    padding: 12px 22px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
      margin-top: 10px;
}

  </style>
</head>

<body>

  <div class="container">
    <span class="material-icons back-icon">arrow_back</span>
    <h1>View Profile</h1>
    <p class="subtitle">View or edit your account details</p>

    @if(session('success'))
    <div style="padding: 12px; background-color: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px;">
      {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div style="padding: 12px; background-color: #f8d7da; color: #721c24; border-radius: 6px; margin-bottom: 20px;">
      <ul style="margin: 0; padding-left: 20px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="profile-section">
      <div class="profile-pic" id="profilePicContainer">
        <img id="profileImage" src="{{ $user->profile_picture ? asset('uploads/profile/'.$user->profile_picture) : url('site/assets/image/testimonial.png') }}" alt="Profile Picture">
      </div> 
      <div class="btn-group">
        <label for="fileInput" class="btn-upload"><span class="material-icons">add</span>Upload new picture</label>
        <input type="file" id="fileInput" name="profile_picture" accept="image/*" style="display:none;">
        <form action="{{ route('removeProfilePicture') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn-remove" id="removeBtn">Remove</button>
        </form>
      </div>
    </div>

    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data" id="profileForm">
      @csrf
      <input type="file" name="profile_picture" id="profilePictureInput" style="display: none;">
      
      <div class="row">
        <div class="col-12">
          <label>Name</label>
          <input type="text" name="name" placeholder="Enter your name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="col-6">
          <label>Email</label>
          <input type="email" name="email" placeholder="example@email.com" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="col-6">
          <label>Phone Number</label>
          <input type="tel" name="phone" placeholder="(+91) 9973248623" value="{{ old('phone', $user->phone) }}">
        </div>
        <div class="col-6">
          <label>Gender</label>
          <select name="gender">
            <option value="">Select Gender</option>
            <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <!-- <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option> -->
          </select>
        </div>
        <div class="col-6">
          <label>Date of Birth</label>
          <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
        </div>
        <div class="col-12">
          <label>Address</label>
          <textarea name="address" placeholder="Enter your address">{{ old('address', $user->address) }}</textarea>
        </div>
      </div>

      <div class="section-title">Measurement Details</div>

      <div class="row">
        <div class="col-6">
          <label>Bust</label>
          <input type="text" name="bust" placeholder='e.g. 34"' value="{{ old('bust', $user->bust) }}">
        </div>
        <div class="col-6">
          <label>Waist</label>
          <input type="text" name="waist" placeholder='e.g. 28"' value="{{ old('waist', $user->waist) }}">
        </div>
        <div class="col-6">
          <label>Hip</label>
          <input type="text" name="hip" placeholder='e.g. 38"' value="{{ old('hip', $user->hip) }}">
        </div>
        <div class="col-6">
          <label>Shoulder width</label>
          <input type="text" name="shoulder_width" placeholder='e.g. 15"' value="{{ old('shoulder_width', $user->shoulder_width) }}">
        </div>
        <div class="col-6">
          <label>Sleeve length</label>
          <input type="text" name="sleeve_length" placeholder='e.g. 23"' value="{{ old('sleeve_length', $user->sleeve_length) }}">
        </div>
        <div class="col-6">
          <label>Dress/Top length</label>
          <input type="text" name="dress_length" placeholder='e.g. 40"' value="{{ old('dress_length', $user->dress_length) }}">
        </div>
      </div>
      <div class="btn-right">
        <button type="submit" class="save-btn">Save Details</button>
      </div>

    </form>
  </div>

  <script>
    const fileInput = document.getElementById('fileInput');
    const profileImage = document.getElementById('profileImage');
    const profilePictureInput = document.getElementById('profilePictureInput');
    const profileForm = document.getElementById('profileForm');
    let uploadedFile = null;

    fileInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        uploadedFile = file;
        const reader = new FileReader();
        reader.onload = function(event) {
          profileImage.src = event.target.result;
        };
        reader.readAsDataURL(file);
        
        // Set the file to the hidden input in the form
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        profilePictureInput.files = dataTransfer.files;
      }
    });
  </script>

  <script>
    document.querySelector('.back-icon').addEventListener('click', function() {
      window.location.href = "{{route('accounts')}}";
    });
  </script>
</body>

</html>