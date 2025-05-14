import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TiendacamisetasComponent } from './tiendacamisetas.component';

describe('TiendacamisetasComponent', () => {
  let component: TiendacamisetasComponent;
  let fixture: ComponentFixture<TiendacamisetasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TiendacamisetasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TiendacamisetasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
