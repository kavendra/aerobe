@extends('layouts.app')
@section('content')
<div class="top-banner csr-banner">
    <div class="textb2">
        <h2>Join Our Mission to Transform Healthcare</h2>
        <p>Be part of a team that's revolutionizing rural healthcare through innovative telemedicine solutions.</p>
    </div>
</div>
<div class="mid-section">
    <div class="our-team">
        <div class="textb">
          <h3>Join Our Team</h3>
          <p>We're looking for talented individuals who want to make a difference. Fill out the application form below to start your journey with us.</p>
        </div>
        <form method="post" action="{{ route('work.store') }}">
        @csrf 
        <div class="formb">
            <div class="row-f">
              <div class="col-f">
                <label>Full Name</label>
                <input type="text" name="name" class="input" placeholder="John Doe" required>
              </div>
              <div class="col-f">
                <label>Gender</label>
                <select class="select" name="gender" required>
                  <option>Select</option>
                  <option>male</option>
                  <option>Female</option>
                </select>
              </div>
            </div>
            <div class="row-f">
              <div class="col-f">
                <label>Email Address</label>
                <input type="text" name="email" class="input" placeholder="example@company.com" required>
              </div>
              <div class="col-f">
                <label>Mobile Number</label>
                <input type="text" name="phone" class="input" placeholder="+91 9876543210" required>
              </div>
            </div>
            <div class="row-f">
              <div class="col-f-w">
                <label>Education</label>
                <input type="text" name="education" class="input" placeholder="Highest qualification" required>
              </div>
            </div>

            <div class="current-employee">
                <h4>Current Employment Details</h4>
                <div class="row-f">
                  <div class="col-f-w">
                    <label>Current Organisation</label>
                    <input type="text" name="organisation" class="input" placeholder="Company Name" required>
                  </div>
                </div>
                <div class="row-f">
                  <div class="col-f-w">
                    <label>Current Designation</label>
                    <input type="text" name="designation" class="input" placeholder="Your job title" required>
                  </div>
                </div>
                <div class="row-f">
                  <div class="col-f">
                    <label>Current Salary (per annum)</label>
                    <input type="text" name="salary" class="input" placeholder="₹ 0,00,000" required>
                  </div>
                  <div class="col-f">
                    <label>Current Experience</label>
                    <input type="text" name="experience" class="input" placeholder="e.g., 2years" required>
                  </div>
                </div>
                <div class="row-f">
                  <div class="col-f-w">
                    <label>Current Job Description</label>
                    <textarea class="textarea" name="description" placeholder="Brief description of your current role and responsibilities" required></textarea>
                  </div>
                </div>
            </div>

            <div class="pre-experiance">
              <h4>Previous Experience</h4>
              <div class="row-f">
                <div class="col-f-w">
                    <label>Total Experience</label>
                    <input type="text" name="total_experience" class="input" placeholder="e.g., 5years" required>
                </div>
              </div>
              <div class="row-f">
                <div class="col-f-w">
                    <label>Previous Organisation</label>
                    <input type="text" name="previous_organisation" class="input" placeholder="Company Name" required>
                </div>
              </div>
              <div class="row-f">
                <div class="col-f-w">
                    <label>Previous Designation</label>
                    <input type="text" name="previous_designation" class="input" placeholder="Your job title" required>
                </div>
              </div>
              <div class="row-f">
                <div class="col-f">
                  <label>Previous Joining Date</label>
                  <input type="date" name="previous_joining_date" class="input" placeholder="dd/mm/yyyy" required>
                </div>
                <div class="col-f">
                  <label>Previous Leaving Date</label>
                  <input type="date" name="previous_leaving_date" class="input" placeholder="dd/mm/yyyy" required>
                </div>
              </div>
            </div>

            <div class="add-information">
              <h4>Additional Information</h4>
                <div class="row-f">
                  <div class="col-f-w">
                    <label>How can you contribute to our company?</label>
                    <textarea class="textarea" name="additional_information" placeholder="Share your Skills, expertise and how you can make a difference"></textarea>
                  </div>
                </div>
                <div class="row-f">
                  <div class="col-f-w">
                    <label>What do you want to work with us?</label>
                    <textarea class="textarea" name="want_to_work" placeholder="Tell us what motivates you to apply for this position"></textarea>
                  </div>
                </div>
            </div>
            <div class="upload-doc">
              <h4>Upload Documents</h4>
              <div class="row-f">
                <div class="col-f">
                  <label>Upload your photo</label>
                  <div class="upload-box">
                    <label class="upload-label" for="customFile">
                      <img src="{{ asset('img/icon-upload.jpg') }}" />
                      <p class="file-name" id="file-name">Drop files to upload or browse</p>
                      <span class="max-file">Maximum file size : 5MB</span>
                    </label>
                    <input type="file" name="photo" id="customFile" class="upload-input" onchange="showFileName(this)">
                  </div>
                </div>
                <div class="col-f">
                  <label>Upload your CV</label>
                  <div class="upload-box">
                    <label class="upload-label" for="customFile">
                      <img src="{{ asset('img/icon-upload.jpg') }}" />
                      <p class="file-name" id="file-name-cv">Drop files to upload or browse</p>
                      <span class="max-file">PDF, DOCX, MAX, 10MB</span>
                    </label>
                    <input type="file" name="cv" id="customFilecv" class="upload-input" onchange="showFileName(this)">
                  </div>
                </div>
              </div>
              <div class="row-f">
                <button class="c-btn" type="submit">Submit Application</button>
              </div>
            </div>
        </div>
        </form>
      </div>
</div>
@endsection