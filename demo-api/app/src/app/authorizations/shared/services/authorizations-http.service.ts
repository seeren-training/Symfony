import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

import { User } from 'src/app/core/models/user.model';
import { UserService } from 'src/app/core/services/user.service';
import { environment } from 'src/environments/environment';


@Injectable({
  providedIn: 'any'
})
export class AuthorizationsHttpService {

  constructor(
    private http: HttpClient,
    private user: UserService) { }

  post(email: string, password: string): Observable<User> {
    return this.http
      .post<User>(environment.api.authozizations.register, {
        email: email,
        password: password
      });
  }

  get(email: string, password: string): Observable<User> {
    return this.http
      .post<User>(environment.api.authozizations.login, {
        email: email,
        password: password
      }).pipe(tap((data: User) => this.user.set(data)));
  }

}
