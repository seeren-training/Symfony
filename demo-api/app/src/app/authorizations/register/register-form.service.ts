import { Injectable } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from "@angular/forms";

import { ConfirmValidator } from '../shared/validators/confirm-validator.directive';


@Injectable({
    providedIn: 'root'
})
export class RegisterFormService {

    constructor(
        private builder: FormBuilder,
        private confirmValidator: ConfirmValidator) {
    }

    get(): FormGroup {
        return this.builder.group({
            email: ['', [Validators.required, Validators.email]],
            password: ['', Validators.required],
            confirm: ['', [Validators.required, this.confirmValidator]],
        });
    }

}
