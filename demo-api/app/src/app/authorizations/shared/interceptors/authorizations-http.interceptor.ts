import { HttpErrorResponse, HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';
import { catchError, finalize } from 'rxjs/operators';

import { environment } from 'src/environments/environment';
import { LoadingService } from '../services/loading.service';


@Injectable({
  providedIn: 'root'
})
export class AuthorizationsHttpInterceptor implements HttpInterceptor {

  constructor(private loading: LoadingService) { }

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    let action = null;
    if (req.url === environment.api.authozizations.login) {
      action = 'login';
    } else if (req.url === environment.api.authozizations.register) {
      action = 'register';
    } else {
      return next.handle(req);
    }
    this.loading[action] = true;
    return next.handle(req).pipe(
      catchError((error: HttpErrorResponse) => {
        let message = 'Invalid Form';
        if (!error.status) {
          message = 'Network Error';
        } else if (404 === error.status) {
          message = 'Invalid Credentials';
        } else if (409 === error.status) {
          message = error.error['error'];
        } else if (500 === error.status) {
          message = 'Server Error';
        }
        throw message;
      }),
      finalize(() => {
        this.loading[action] = false;
      })
    );
  }

}
