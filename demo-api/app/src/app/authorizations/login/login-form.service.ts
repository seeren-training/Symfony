import { Injectable } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from "@angular/forms";


@Injectable({
    providedIn: 'root'
})
export class LoginFormService {

    constructor(private builder: FormBuilder) { }

    get(): FormGroup {
        return this.builder.group({
            email: ['', Validators.email],
            password: ['', Validators.required]
        });
    }

}
