import { Injectable } from '@angular/core';
import { Meta, Title } from '@angular/platform-browser';
import { ActivatedRoute, Event, NavigationEnd, Router } from '@angular/router';

import { filter, map, mergeMap } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class SeoService {

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private title: Title,
  ) {
    this.router.events
      .pipe(
        filter((event: Event) => event instanceof NavigationEnd),
        map(() => this.route),
        map((route: ActivatedRoute) => {
          while (route.firstChild) {
            route = route.firstChild;
          }
          return route;
        }),
        filter((route: ActivatedRoute) => route.outlet === 'primary'),
        mergeMap((route: ActivatedRoute) => route.data)
      )
      .subscribe((data: Object) => this.setTitle(data["title"]));
  }

  setTitle(title: string): void {
    this.title.setTitle(title);
  }

}
