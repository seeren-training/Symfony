import { Directive, Injectable } from '@angular/core';
import { AbstractControl, NG_VALIDATORS, ValidationErrors, Validator } from '@angular/forms';

import { Subscription } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
@Directive({
  selector: '[appConfirm]',
  providers: [{ provide: NG_VALIDATORS, useExisting: ConfirmValidator, multi: true }]
})
export class ConfirmValidator implements Validator {

  private subscription: Subscription;

  validate(control: AbstractControl): ValidationErrors | null {
    if (!control.dirty) {
      if (this.subscription) {
        this.subscription.unsubscribe();
        this.subscription = null;
      }
      return null;
    }
    if (!this.subscription) {
      this.subscription = control.root.get('password')
        .valueChanges.subscribe(() => control.updateValueAndValidity())
    }
    return control.root.get('password').value !== control.value ? { 'confirm': true } : null;
  }

}
