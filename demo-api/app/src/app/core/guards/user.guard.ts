import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';

import { Observable } from 'rxjs';

import { UserService } from "../services/user.service";


@Injectable({
    providedIn: 'root'
})
export class UserGuard implements CanActivate {

    constructor(
        private userService: UserService,
        private router: Router) {
    }

    canActivate(
        next: ActivatedRouteSnapshot,
        state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
        if ("authorizations" === next.routeConfig.path && this.userService.has()) {
            return this.router.navigate(['/users'])
        }
        if ("users" === next.routeConfig.path && !this.userService.has()) {
            return this.router.navigate(['/authorizations'])
        }
        return true;
    }

}
