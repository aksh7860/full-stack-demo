import { Component, ChangeDetectorRef, ElementRef, ViewChild } from '@angular/core';
import { FormBuilder, FormArray, Validators } from "@angular/forms";
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  submitted = false;

  // City names
  City: any = ['Florida', 'South Dakota', 'Tennessee', 'Michigan']
  
  constructor(
    public fb: FormBuilder,
    private cd: ChangeDetectorRef,
    private http: HttpClient
  ) {}

  /*##################### Registration Form #####################*/
  registrationForm = this.fb.group({
    name: ['', [Validators.required]],
    email: ['', [Validators.required, Validators.pattern('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$')]],
    contact_no: ['', [Validators.required, Validators.maxLength(10), Validators.pattern('^[0-9]+$')]],
    addDynamicElement: this.fb.array([])
  })  

  

  // Getter method to access formcontrols
  get myForm() {
    return this.registrationForm.controls;
  }

  // Submit Registration Form
  onSubmit() {
    this.submitted = true;
    if(!this.registrationForm.valid) {
      alert('Please Check The Form Errors and Try Submitting Again!')
      return false;
    } else {
      console.log(this.registrationForm.value);
      let user = this.registrationForm.value;
      let postData = JSON.stringify(user);
      console.log(postData);
      this.sendPostRequest(postData).subscribe(
        res => {
          console.log(res);
        }
      );
    }
  }

  sendPostRequest(data: any): Observable<any> {
     return this.http.post<any>("http://localhost/api/user/create.php", data);
  }

}