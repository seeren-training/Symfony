import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class LoadingService {

  public login: boolean;

  public register: boolean;

  constructor() { }
  
}
