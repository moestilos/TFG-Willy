import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TiendasudaderasComponent } from './tiendasudaderas.component';

describe('TiendasudaderasComponent', () => {
  let component: TiendasudaderasComponent;
  let fixture: ComponentFixture<TiendasudaderasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TiendasudaderasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TiendasudaderasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
