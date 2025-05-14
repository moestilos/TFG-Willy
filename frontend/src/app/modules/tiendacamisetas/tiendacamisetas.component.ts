import { Component } from '@angular/core';
import { NavComponent } from "../nav/nav.component";
import { HeaderComponent } from "../header/header.component";
import { FooterComponent } from "../footer/footer.component";

@Component({
  selector: 'app-tiendacamisetas',
  imports: [NavComponent, HeaderComponent, FooterComponent],
  templateUrl: './tiendacamisetas.component.html',
  styleUrl: './tiendacamisetas.component.css'
})
export class TiendacamisetasComponent {

}
